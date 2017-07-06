<?php

namespace App\Http\Controllers;

use Solarium\Client;
use Solarium\Exception;
use Illuminate\Http\Request;

class SolariumController extends Controller {
	protected $client;
	public function __construct(Client $client) {
		$this->client = $client;
	}
	
	/**
	 * Pings the SOLR instance
	 */
	public function ping() {
		// create a ping query
		$ping = $this->client->createPing ();
		
		// execute the ping query
		try {
			$this->client->ping ( $ping );
			return response ()->json ( 'OK' );
		} catch ( Exception $e ) {
			return response ()->json ( 'ERROR', 500 );
		}
	}
	public function search(Request $request) {
		if ($request->getMethod () == Request::METHOD_POST) {
			$input = $request->input();
			$searchField=$input['Search'];
			$pattern="/ /";			
			$searchWords=preg_split($pattern, $searchField);
			
			//echo 'Search Words:';
			//print_r($searchWords);
			
			$client = $this->client;
			$query = $client->createSelect();
			
			// print_r($query);
			$queryString=NULL;
			foreach ($searchWords as $searchWord) {
				if (isset($queryString)){
					$queryString.=' and ';
				}
				if (!is_numeric($searchWord)){
					$queryString.='author_txt_en_split:*'.$searchWord.'* or subject_txt_en_split:*'.$searchWord.'* or bookmonth_txt_en_split:*'.$searchWord.'*';
				} else {
					$queryString.='bookyear_i:*'.$searchWord.'* or booknumber_i:*'.$searchWord.'*';
				}
			}
			$query->setQuery($queryString);
			//$query->addFilterQuery(array('key'=>'bookname', 'query'=>'*:*'));
			// $query->addFilterQuery(array('key'=>'degree', 'query'=>'degree:MBO', 'tag'=>'exclude'));
			$facets = $query->getFacetSet();
			$facets->createFacetField('bookname')->setField('bookname_ws');
			$facets->setMinCount(1);
			//$groupComp=$query->getGrouping();
			//$groupComp->addField('bookname_ws');			
			$query->setFields(array('bookname_ws','author_txt_en_split','bookyear_i','bookmonth_txt_en_split','subject_txt_en_split'));
			//echo 'Query:<br/>';
			//print_r($query);
			
			$resultset = $client->select( $query );
			//echo '<br/><br/> ResultSet:<br/>';
			//print_r($resultset);
			// display the total number of documents found by solr
			//echo 'NumFound: ' . $resultset->getNumFound ();
			//echo '<br/>';
			//echo 'Books:<br/>';
			//print_r($resultset->getFacetSet()->getFacets());
			//$groups = $resultset->getGrouping();
			// show documents using the resultset iterator
			/* foreach ( $resultset as $document ) {
				
				echo '<hr/><table>';
				
				// the documents are also iterable, to get all fields
				foreach ( $document as $field => $value ) {
					// this converts multivalue fields to a comma-separated string
					if (is_array ( $value )) {
						$value = implode ( ', ', $value );
					}					
					echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
				}				
				echo '</table>';
			} */
			//$books=$resultset->getFacetSet()->getFacets()['bookname'];
			/* echo '<hr/><table>';
			foreach ($books as $bookname=>$count){
				echo '<tr><td>' . $bookname. '</td></tr>';
			}
			echo '</table>'; */
			/* foreach ($groups as $groupKey => $fieldGroup) {
				
				echo '<h1>'.$groupKey.'</h1>';
				echo 'Matches: '.$fieldGroup->getMatches().'<br/>';
				echo 'Number of groups: '.$fieldGroup->getNumberOfGroups();
				
				foreach ($fieldGroup as $valueGroup) {
					
					echo '<h2>'.(int)$valueGroup->getValue().'</h2>';
					
					foreach ($valueGroup as $document) {
						
						echo '<hr/><table>';
						
						// the documents are also iterable, to get all fields
						foreach ($document as $field => $value) {
							// this converts multivalue fields to a comma-separated string
							if (is_array($value)) {
								$value = implode(', ', $value);
							}
							
							echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
						}
						
						echo '</table>';
					}
				}
			} */
			return view('search')->with(['results'=>$resultset])->with('query',$searchField);
		}
		if ($request->getMethod () == Request::METHOD_GET) {
			return view('search');
		}
	}
	public function index() {
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    
	/**
	 * [getActionsSessionName description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function getActionsSessionName(Request $request)
	{
		
		$r_data = [
	    	'socnet' 	=> $request->social_network,
			'uacc' 		=> $request->user_account,
			'sname' 	=> $request->script_name,
			// 'fdata' 	=> $request->form_data,
		];

		foreach ($r_data as $key => $value)
			$r_data[$key] = str_replace(' ', '', $value);

		return $r_data['socnet'] . "-" . $r_data['uacc'] . "-" . $r_data['sname'];

	}


	/**
	 * [saveActionsSession description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function saveRssSession(Request $request)
    {
    	$data = [];
    	$script_type = trim($request->rss_script_type);
    	$session_data = $this->getActionsSession($request, true);
        $this->removeActionsSessionData($request);

    	$session_name = $this->getActionsSessionName($request);
    	$string = '-> ';

    	$data[$session_name] = [];
    	if (@$session_data['keyword'] && $request->rss_script_type != 'keyword') {
    		$string .= ' keyword ';
    		$data[$session_name] += [ 'keyword' => $session_data['keyword'] ];
    	}

    	if (@$session_data['random'] && $request->rss_script_type != 'random') {
    		$string .= ' random ';
   			$data[$session_name] += [ 'random' => $session_data['random'] ];
    	}

    	if (@$session_data['calendar'] && $request->rss_script_type != 'calendar') {
    		$string .= ' calendar ';
			$data[$session_name] += ['calendar' => $session_data['calendar'] ];
    	}

    	if (@$session_data['lastTime'] && $request->rss_script_type != 'lastTime') {
    		$string .= ' lastTime ';
			$data[$session_name] += ['lastTime' => $session_data['lastTime'] ];
    	}

    	$data[$session_name] += [
				trim($request->rss_script_type) =>	[
					'network_name' 	=> trim($request->social_network),
					'user_account' 	=> trim($request->user_account),
					'script_name' 	=> trim($request->script_name),
					'data' 			=> $request->form_data,
				],
			];
		

        $result = session($data);
		// $result = session($data);
		// Keeping persistent only $data:  
		// $request->session()->keep([ $this->getActionsSessionName($request) ]);
    	$session_data = $this->getActionsSession($request, true);
		
    	return response()->json( ['Accepted data' => $data, 'scr_type' => $request->rss_script_type, 'session_data' => $session_data, 'result' => $result, 'string' => $string] );
    	// return response()->json( ['Accepted data' => $data, 'result' => $result, 'removed' => $removing] );

    }



    public function saveActionSession(Request $request)
    {

    	$data = [];
    	$script_name = trim($request->script_name);
    	$session_data = $this->getActionsSession($request, true);
    	$this->removeActionsSessionData($request);

    	$session_name = $this->getActionsSessionName($request);

    	// $data[$session_name] = [];

    	$data[$session_name] = [
				
			'network_name' 	=> trim($request->social_network),
			'user_account' 	=> trim($request->user_account),
			'script_name' 	=> trim($request->script_name),
			'data' 			=> $request->form_data,
			
		];
		

		$result = session($data);
		// Keeping persistent only $data:  
		// $request->session()->keep([ $this->getActionsSessionName($request) ]);
    	$session_data = $this->getActionsSession($request, true);
		
    	return response()->json( ['Accepted data' => $data, 'session_data' => $session_data, 'request' => $request->form_data]);

    }



    /**
     * [getActionsSession description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getActionsSession(Request $request, $return = false)
    {
    	
    	$session_name = $this->getActionsSessionName($request);

    	if ($return)
    		return session()->get($session_name);

    	if($request->session()->has($session_name)) {
	    	$session_data = session()->get($session_name);
	    	return response()->json( ['session_name' => $session_name, 'result' => $session_data, 'response' => 'Data found successfully'] );
    	} else {
	    	return response()->json( ['session_name' => $session_name, 'result' => false, 'response' => 'Data not found'] );
    	}

    }


    /**
     * [removeActionsSessionData description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function removeActionsSessionData(Request $request)
    {

    	$session_name = $this->getActionsSessionName($request);
    	
    	if($request->session()->has($session_name)) {
	    	$result = $request->session()->forget($session_name);
	    	return ['Is session removed: ' . $session_name => $result];
    	} else {
    		return ['Session not found: ' . $session_name => false];
    	}

		// $request->session()->flush();
    	/*if ( $request->session()->forget($session_name) ) {
	    	return response()->json( ['Requested session data removed' => $session_name] );
    	} else {
    		return response()->json( ['An error, while removing session data' => $session_name] );
    	}*/

    }


}

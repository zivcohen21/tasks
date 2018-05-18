<?php

class TaskController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        try{
            $statusCode = 200;
            $response = [
                'todo'  => []
            ];

            $tasks = Task::all();

            foreach($tasks as $task){

                $response['todo'][] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'isDone' => $task->isDone
                ];
            }

            //echo  $response;

        } catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        try{
            $task = new Task;
            $task->title = Input::get('title');
            $task->isDone = Input::get('isCompleted');

            $task->save();
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return $statusCode;
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

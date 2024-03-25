<?php

	define('PAGINATION_COUNT', 10);
	define('PAGINATION_COUNT_FRONT', 10);

	function uploadIamge($photo, $folder){
		$destinationPath = 'admin/assets/images/' . $folder . '/'; // upload path
		$extension = $photo->getClientOriginalExtension(); // getting image extension
        $fileName = time() . $photo->hashName() . '.' . $extension;  
		$photo_move = $photo->move(public_path($destinationPath), $fileName);
		return $destinationPath . $fileName;
	}

	function uploadIamges($photos, $folder){
		$images = [];
		foreach ($photos as $photo){
			$destinationPath = 'admin/assets/images/' . $folder . '/'; // upload path
			$extension = $photo->getClientOriginalExtension(); // getting image extension
			$fileName = time() . $photo->hashName() . '.' . $extension;  
			$photo_move = $photo->move(public_path($destinationPath), $fileName);
			$images[] = $destinationPath . $fileName;
		}
		$files = implode(",", $images);
		return $files;
	}

	function responseJson($status, $msg, $data = null)
	{
		$response = [
			'status' => $status,
			'msg' => $msg,
			'data' => $data
		];
		return response()->json($response);
	}


    // "autoload": {
    //     "psr-4": {
    //         "App\\": "app/",
    //         "Database\\Factories\\": "database/factories/",
    //         "Database\\Seeders\\": "database/seeders/"
    //     },
    //     "files" : [
    //         "app/helper/functions.php"
    //     ]
    // },
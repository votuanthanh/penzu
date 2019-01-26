<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

use App\Http\Requests\CreateAlbumRequest;
use App\User;
use App\Album;

use App\Repositories\Eloquent\AlbumRepository;
use App\Repositories\Contracts\AlbumRepositoryInterface;
use Auth;
use Alert;

class AlbumController extends Controller
{
    protected $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function index()
    {
        $albums = $this->albumRepository->getAllAlbum();

        return view('album.index', ['albums' => $albums]);
    }

    public function show($id)
    {
        $album = $this->albumRepository->showAlbum($id);

        return view('album.show', ['album' => $album]);
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(CreateAlbumRequest $request)
    {
        $user = Auth::user();
        // $id = Auth::id();

        try {
            $album = new Album($request->all());
            
            if ($user->albums()->save($album))
            {
                Alert::success('Congratulations!', 'Album was successfully created');
                return redirect()->route('album.index');
                    
            }
        } catch (\Exception $e) {
            Alert::error('Oops.. !', 'Album was not created');
            return redirect()->route('album.index');   
        }
    }

    public function edit($id)
    {
       $album = $this->albumRepository->showAlbum($id);

        return view('album.edit', ['album' => $album]);
    }

    public function update(CreateAlbumRequest $request, $id)
    {
        try {
            if ($this->albumRepository->update($request->all(), $id))
            {
                Alert::success('Congratulations!', 'Album was successfully updated');
                return redirect()->route('album.index');
            }

        } catch (\Exception $e) {
            Alert::error('Oops.. !', 'Album was not updated');

            return redirect()->route('album.index');         
        }
    }

    public function delete($id)
    {
        if($this->albumRepository->delete($id))
        {
            Alert::success('Congratulations!', 'Album was successfully deleted');
            return redirect()->route('album.index');
                    
        }
    }
}

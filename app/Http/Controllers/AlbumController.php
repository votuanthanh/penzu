<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

use App\Http\Requests\CreateAlbumRequest;
use App\Journal;
use App\User;
use App\Album;

use App\Repositories\Eloquent\AlbumRepository;
use App\Repositories\Contracts\AlbumRepositoryInterface;
use Auth;

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
                return redirect()
                    ->route('album.index')
                    ->with('level', 'success')
                    ->with('message', 'Album was successfully created');
            }
        } catch (\Exception $e) {
            return redirect()
                    ->route('album.index')
                    ->with('level', 'danger')
                    ->with('message', 'Album was not created');
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
                return redirect()
                        ->route('album.index')
                        ->with('level', 'success')
                        ->with('message', 'Album was successfully updated');

        } catch (\Exception $e) {
            return redirect()
                ->route('album.index')
                ->with('level', 'danger')
                ->with('message', 'Album was not updated');
        }
    }

    public function delete($id)
    {
        if($this->albumRepository->delete($id))
        return redirect()
                    ->route('album.index')
                    ->with('level', 'success')
                    ->with('message', 'Album was successfully deleted'); 
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\API\ApiError;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * @var Praylist
     */
    private $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }

    public function index()
    {
        $playlist = ['playlist' =>$this->playlist::paginate(10)];

        return response()->json($playlist);
    }

    public function show($id)
    {
         $playlist = $this->playlist->find($id);

         if( !$playlist ) return response()->json(ApiError::errorMessage('Playlist não encontrada!', 4040), 404);

         $data = ['data' => $playlist];
         return response()->json($data);
    }
   

    public function store(Request $request)
    {
        //Falta Validar os campos

        try{

         $playlist = $request->all();
         $this->playlist->create($playlist);
        
        $return = ['data' => ['msg' => 'Playlist criada com sucesso!']];
        return response()->json($return, 201);
        
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar e/ou criar ', 1010), 500);
        }

    }

    public function update(Request $request, $id)
    {
        try{

        $playlistData = $request->all();
        $playlist = $this->playlist->find($id);
        
        $playlist->update($playlistData);

        $return = ['data' => ['msg' => 'Playlist atualizada com sucesso!']];
        return response()->json($return, 201);
        
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar ', 1011), 500);
        }

    }

    public function delete(Playlist $id)
    {
        try {
            $id->delete();

            return response()->json(['data'=> ['msg' => ' Playlist ' . $id->title . 'removido com sucesso']], 200);

        }catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012), 500);
        }
    }
}

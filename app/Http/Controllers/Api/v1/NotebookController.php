<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\NotebookRequest;
use App\Models\Notebook;
use Illuminate\Http\Response;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Future super REST API",
 *     description="Документация сервиса",
 * )
 *
 * @OA\Get(
 *     path="/api/v1/notebooks",
 *     summary="- получить все записи",
 *     tags={"Notebook"},
 *     description="Главная, вывод всех записей постранично",
 *     @OA\Parameter(name="page", in="query", description="pagination", required=false,
 *         @OA\Schema(type="integer", minimum="1", description="Номер страницы")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Все записи"
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/v1/notebooks",
 *     summary="добавить запись",
 *     description="Добавляет запись в записную книгу",
 *     tags={"Notebook"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"full_name", "phone", "email"},
 *             @OA\Property(property="full_name", type="string", format="text", example="Петров Иван Витальевич"),
 *             @OA\Property(property="company", type="string", format="text", example="Яндекс"),
 *             @OA\Property(property="phone", type="string", format="number", example="+79774040001"),
 *             @OA\Property(property="email", type="string", format="email", example="user@exemple.com"),
 *             @OA\Property(property="birthday", type="string", format="date", example="01.01.2001"),
 *             @OA\Property(property="photo", type="string", format="text", example="https://exemple.com/foto.jpg"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *        @OA\JsonContent(
 *           @OA\Property(property="status", type="boolian", example="true"),
 *           @OA\Property(property="message", type="string", example="Notebook item Created successfully!")
 *        )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/v1/notebooks/{id}",
 *     summary="получить запись",
 *     description="Получает запись по ID",
 *     tags={"Notebook"},
 *     @OA\Parameter(description="ID удаляемой записи", in="path", name="id", required=true,
 *         @OA\Schema(type="integer", minimum="1")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *        @OA\JsonContent(
 *           @OA\Property(property="status", type="boolian", example="true")
 *        )
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/v1/notebooks/{id}",
 *     summary="отредактировать запись",
 *     description="Отредактировать запись в записной книге",
 *     tags={"Notebook"},
 *     @OA\Parameter(description="ID редактируемой записи", in="path", name="id", required=true,
 *         @OA\Schema(type="integer", minimum="1")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"full_name", "phone", "email"},
 *             @OA\Property(property="full_name", type="string", format="text", example="Петров Иван Витальевич UPDATE"),
 *             @OA\Property(property="company", type="string", format="text", example="Яндекс UPDATE"),
 *             @OA\Property(property="phone", type="string", format="number", example="+79774040001"),
 *             @OA\Property(property="email", type="string", format="email", example="user@exemple.com"),
 *             @OA\Property(property="birthday", type="string", format="date", example="01.01.2001"),
 *             @OA\Property(property="photo", type="string", format="text", example="https://exemple.com/foto.jpg"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *        @OA\JsonContent(
 *           @OA\Property(property="status", type="boolian", example="true"),
 *           @OA\Property(property="message", type="string", example="Notebook item Updated successfully!")
 *        )
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/v1/notebooks/{id}",
 *     summary="удалить запись",
 *     description="Удаляет запись в записной книге",
 *     tags={"Notebook"},
 *     @OA\Parameter(description="ID удаляемой записи", in="path", name="id", required=true,
 *         @OA\Schema(type="integer", minimum="1")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *        @OA\JsonContent(
 *           @OA\Property(property="status", type="boolian", example="true"),
 *           @OA\Property(property="message", type="string", example="Notebook item Deleted successfully!")
 *        )
 *     )
 * )
 */
class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notebooks = Notebook::paginate(10);

        return response()->json([
            'status' => true,
            'items' => $notebooks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NotebookRequest $request
     * @return Response
     */
    public function store(NotebookRequest $request)
    {
        $notebook = Notebook::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Notebook item Created successfully!',
            'item' => $notebook
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Notebook $notebook
     * @return Response
     */
    public function show(Notebook $notebook)
    {
        return response()->json([
            'status' => true,
            'item' => $notebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NotebookRequest $request
     * @param Notebook $notebook
     * @return Response
     */
    public function update(NotebookRequest $request, Notebook $notebook)
    {
        $notebook->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Notebook item Updated successfully!',
            'item' => $notebook
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Notebook $notebook
     * @return Response
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response()->json([
            'status' => true,
            'message' => 'Notebook item Deleted successfully!'
        ], 200);
    }
}

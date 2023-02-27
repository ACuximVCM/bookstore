<?php

namespace App\Http\Controllers;

use App\Models\ReservationBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(): JsonResponse
    {
        $list = DB::table('reservation_books')
            ->select(
                'reservation_books.id',
                'books.name',
                'reservations.total',
                'reservations.books_total',
                DB::raw("CONCAT(authors.first_name, ' ', authors.last_name) as author_name")
            )
            ->join('books', 'reservation_books.book_id', '=', 'books.id')
            ->join('reservations', 'reservation_books.reservation_id', '=', 'reservations.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->get();

        return response()->json($list);
    }

    public function listEloquent(): JsonResponse
    {
        // TODO: HACER LOS CRUDS
        $list = ReservationBook::with([
                'reservation' => function ($query) {
                    $query->select(
                        'id',
                        'books_total',
                        'total',
                        'reservation_date',
                    )
                    ->where('active', '=', true);
                },
                'book' => function ($query) {
                    $query->select('id', 'name', 'author_id');
                },
                'book.author' => function ($query) {
                    $query->select(
                        'id',
                        'first_name',
                        'last_name'
                    );
                }
                // 'book' => function ($query) {
                //     // NOTE: Este còdigo es para llegar a la tabla abuelo.
                //     $query->with('author:id,first_name,last_name');
                // }
            ])
            ->get();

        return response()->json($list);
    }
}

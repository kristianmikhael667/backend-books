<?php

namespace App\Helpers;

class TransformBook
{
    public static function books($detailbooks)
    {
        return [
            'uid' => $detailbooks->uid,
            'slug' => $detailbooks->slug,
            'catalog_id' => $detailbooks->catalog_id,
            'author_book' => $detailbooks->author_book,
            'title_book' => $detailbooks->title_book,
            'publish_book' => $detailbooks->publish_book,
            'sinopsis_book' => $detailbooks->sinopsis_book,
            'cover_book' => $detailbooks->cover_book,
            'publish_date' => $detailbooks->publish_date,
            'status_book' => $detailbooks->status_book,
            'created_at' => $detailbooks->created_at,
            'name_catalog' => $detailbooks->catalog->name_catalog,
            'qty' => $detailbooks->qtybook->qty,
        ];
    }

    public static function allbooks($books)
    {
        try {
            if ($books) {
                $book = $books->map(function ($item) {
                    return [
                        'uid' => $item->uid,
                        'slug' => $item->slug,
                        'catalog_id' => $item->catalog_id,
                        'author_book' => $item->author_book,
                        'title_book' => $item->title_book,
                        'publish_book' => $item->publish_book,
                        'sinopsis_book' => $item->sinopsis_book,
                        'cover_book' => $item->cover_book,
                        'publish_date' => $item->publish_date,
                        'status_book' => $item->status_book,
                        'created_at' => $item->created_at,
                        'name_catalog' => $item->catalog['name_catalog'],
                        'qty' => $item->qtybook['qty'],
                    ];
                });
                return $book;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

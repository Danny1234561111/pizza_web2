<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Products;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request, Products $product)
    {
        $validatedData = $request->validate([
            'text' => ['required', 'string', 'min:5'],
        ]);

        $comment = new Comment([
            'text' => $validatedData['text'],
        ]);

        $product->comments()->save($comment);

        return redirect()->route('product.index')->with('success', 'Комментарий успешно добавлен');
    }

    public function edit(Products $product, Comment $comment)
    {
        return view('product.edit_comment', compact('product', 'comment'));
    }

    public function update(Request $request, Products $product, Comment $comment)
    {
        $validatedData = $request->validate([
            'text' => ['required', 'string', 'min:5'],
        ]);

        $comment->text = $validatedData['text'];
        $comment->save();

        return redirect()->route('product.index')->with('success', 'Комментарий успешно изменен.');
    }

    public function destroy(Products $product, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('product.index')->with('success', 'Комментарий успешно удален.');
    }

    public function showComments(Products $product)
    {
        $comments = $product->comments;
        return response()->json([
            'success' => true,
            'comments' => $comments,
        ]);
    }
}

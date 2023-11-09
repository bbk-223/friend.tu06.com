<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message($userId)
    {

      //  $createdConversation =   Conversation::updateOrCreate(['sender_id' => auth()->id(), 'receiver_id' => $userId]);

      $authenticatedUserId = auth()->id();

      # Check if conversation already exists
      $existingConversation = Conversation::where(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $authenticatedUserId)
                    ->where('receiver_id', $userId);
                })
            ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $authenticatedUserId);
            })->first();
        
      if ($existingConversation) {
          # Conversation already exists, redirect to existing conversation
          return redirect()->route('chat', ['query' => $existingConversation->id]);
      }
  
      # Create new conversation
      $createdConversation = Conversation::create([
          'sender_id' => $authenticatedUserId,
          'receiver_id' => $userId,
      ]);
 
        return redirect()->route('chat', ['query' => $createdConversation->id]);
        
    }
}

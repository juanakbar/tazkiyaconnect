<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $notif = [
            [
                "id" => 1,
                "profile" => "profile-1.jpeg",
                "message" => "<strong class=\"text-sm mr-1\">John Doe</strong> invited you to <strong>Prototyping</strong>",
                "time" => "45 min ago"
            ],
            [
                "id" => 2,
                "profile" => "profile-2.jpeg",
                "message" => "<strong class=\"text-sm mr-1\">Jane Smith</strong> commented on your post",
                "time" => "30 min ago"
            ],
            [
                "id" => 3,
                "profile" => "profile-3.jpeg",
                "message" => "<strong class=\"text-sm mr-1\">Mike Johnson</strong> liked your photo",
                "time" => "15 min ago"
            ],
            [
                "id" => 4,
                "profile" => "profile-4.jpeg",
                "message" => "<strong class=\"text-sm mr-1\">Emily Davis</strong> sent you a friend request",
                "time" => "10 min ago"
            ],
            [
                "id" => 5,
                "profile" => "profile-16.jpeg",
                "message" => "<strong class=\"text-sm mr-1\">Chris Lee</strong> started following you",
                "time" => "5 min ago"
            ]
        ];
        return view('layouts.app', compact('notif'));
    }
}

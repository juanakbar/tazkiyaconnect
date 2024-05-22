<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\json;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $selectedRole = Role::where('name', $role)->first();
        // return response()->json(auth()->user()->role);
        if (Auth::check()) {
            // User is logged in
            if (auth()->user()->role->name === $selectedRole->name) {
                return $next($request);
            } else {
                // Redirect to welcome page if user is logged in but doesn't have admin role
                Auth::logout();
                flash()->addError('Kamu Tidak Mempunyai Akses Kehalaman ini.');
                return redirect('/');
            }
        } else {
            // User is not logged in, redirect to login page
            return redirect()->route('admin.login');
        }
    }
}

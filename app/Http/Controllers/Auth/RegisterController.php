<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    /**
     * Muestra la vista del formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(4);
        return view('users.index', compact('users'));
    }


    public function createUser()
    {
        $users = User::all();
        return view('users.create', compact('users'));
    }

    // Muestra el producto con el ID especificado
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Muestra el formulario para editar un user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Producto eliminado correctamente.');
    }


    public function create()
    {

        return view('auth.register');
    }

    /**
     * Almacena un nuevo usuario después de validar
     * la información del formulario de registro.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(Request $request){
        try {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'min:8', 'regex:/^(?=.*[0-9])(?=.*[^a-zA-Z0-9])/',],
                'role' => ['required', 'numeric'], // Asegúrate de validar el campo 'role'
            ]);

            $roleId = $request->input('role'); // Obtenemos el valor del campo 'role'

            // Lógica para crear el usuario con el rol seleccionado
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role_id' => $roleId, // Asignamos el ID del rol seleccionado
            ]);

            Log::info('Usuario Registrado '.$user->email);
            Log::info('Usuario Registrado '.$user->type);

            return redirect()->route('users.index');

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error al registrar usuario: ' . $e->getMessage());
            return back()->withErrors(['message' => 'Error al registrar el usuario. Por favor, inténtalo de nuevo.']);
        }
    }

    public function store()
    {
        try {
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[0-9])(?=.*[^a-zA-Z0-9])/',],
                'g-recaptcha-response' => 'required|captcha',
            ], [
                'g-recaptcha-response.required' => 'Por favor, completa el campo reCAPTCHA.',
                'g-recaptcha-respo nse.captcha' => 'El campo reCAPTCHA no es válido. Por favor, inténtalo de nuevo.',
                'password.regex' => 'La contraseña debe tener al menos 8 caracteres e incluir al menos un número y un carácter especial.',
            ]);

            $noUsers = User::count() === 0;
            $rol = Role::where('rol', 'Administrador')->value('id');
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'role_id' => $noUsers ? Role::where('rol', 'Administrador')->value('id') : Role::where('rol', 'Invitado')->value('id'),
            ]);

            Log::info('Usuario Registrado '.$user->email);
            Log::info('Usuario Registrado '.$user->type);

            return redirect()->route('login.index');

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error al registrar usuario: ' . $e->getMessage());
            Log::error('Intento Rol de Registro: ' . $rol);
            return back()->withErrors(['message' => 'Error al registrar el usuario. Por favor, inténtalo de nuevo.']);
        }
    }
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="wrapper justify-center h-screen flex bg-gray-100">
        <div class="form-wrapper bg-white p-10 m-auto w-96 shadow">
            <h2 class="text-4xl font-bold py-5 mb-5 text-black uppercase">Sign Up</h3>
                <form action="#" class="flex flex-col gap-5 justify-center items-center">
                    <input type="hidden" name="type" value="register" />

                    <input type="text" name="username" placeholder="Username" class="w-full px-3 py-2 m-2 border-b-2 border-gray-400 focus:outline-none placeholder:text-gray-300 placeholder:px-none" />


                    <input type="password" name="password" placeholder="Password" class="w-full px-3 py-2 m-2 border-b-2 border-gray-400 focus:outline-none placeholder:text-gray-300" />

                    <input type="password" name="passwordRepeat" placeholder="Repeat Password" class="w-full px-3 py-2 m-2 border-b-2 border-gray-400 focus:outline-none placeholder:text-gray-300" />

                    <button type="submit" class="w-full mt-5 px-3 py-2 hover:bg-black hover:text-white bg-white border-black border-2 text-black active:bg-black">
                        Register
                    </button>

                    <span class="mt-6   text-center text-gray-900"> have an account ? <a href="login.php" class="font-bold text-slate-800 hover:text-slate-700 focus:outline-none focus:underline transition ease-in-out duration-150">Sign In</a></span>
                </form>
        </div>
    </div>

</body>

</html>
<?php

namespace DevxPackage\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class MakeAuthCycle extends Command
{
    protected $file;

    public function __construct(Filesystem $file)
    {
        parent::__construct();
        $this->file = $file;
    }

    protected $signature = 'devx:make:authcycle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command to make auth cycle';

    function makeDir($path)
    {
        $this->file->makeDirectory($path, 0777, true, true);
    }

    function setFileContint($file_path, $fileKeys)
    {
        $keys = [];
        $values = [];
        $content = file_get_contents($file_path);
        foreach ($fileKeys as $key => $value) {
            $keys [] = $key;
            $values [] = $value;
        }
        $template = str_replace($keys, $values, $content);
        return $template;
    }

    function makeRoute()
    {
        $file_path = base_path("routes/") . "admin.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminRoute.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeModel()
    {
        $file_path = base_path("app/Models/") . "Admin.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminModel.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeMigration()
    {
        $file_path = base_path("database/migrations/") . "2023_10_19_000000_create_admins_table.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminMigration.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeSeeder()
    {
        $file_path = base_path("database/seeders/") . "AdminSeeder.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminSeeder.stub", []);
        $this->file->put($file_path, $file_content); 
    }


    function makeController()
    {
        $file_path = base_path("app/Http/Controllers/Admin/") . "AdminController.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminController.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthController()
    {
        $file_path = base_path("app/Http/Controllers/Admin/") . "AuthController.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthController.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeRepository()
    {
        $file_path = base_path("app/Http/Repositories/Eloquent/Admin/") . "AdminRepository.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminRepository.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthRepository()
    {
        $file_path = base_path("app/Http/Repositories/Eloquent/Admin/") . "AuthRepository.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthRepository.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthServices()
    {
        $file_path = base_path("app/Http/ServicesLayer/Admin/AdminServices/") . "AuthService.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthServices.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthMiddleware()
    {
        $file_path = base_path("app/Http/Middleware/") . "AdminLogin.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLoginMiddleware.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeLimitRequestMiddleware()
    {
        $file_path = base_path("app/Http/Middleware/") . "LimitReq.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLimitRequestMiddleware.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAdminRequest()
    {
        $file_path = base_path("app/Http/Requests/Admin/AdminRequests/") . "AdminStoreRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminStoreRequest.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("app/Http/Requests/Admin/AdminRequests/") . "AdminUpdateRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminUpdateRequest.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAdminAuthRequest()
    {
        $file_path = base_path("app/Http/Requests/Admin/AdminRequests/") . "AdminLoginRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthRequest.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAdminDachboardSettings()
    {
        $file_path = base_path("app/Http/Controllers/Admin/") . "HomeController.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminHomeController.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("app/Http/Repositories/Eloquent/Admin/") . "HomeRepository.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminHomeRepository.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("app/Http/ServicesLayer/Admin/HomeServices/") . "HomeService.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminHomeServices.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/auth/") . "login.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLogin.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/") . "home.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminHomeBlade.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("app/helper/") . "functions.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminHelperFunctions.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/layouts/admin/") . "home.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLayoutHome.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/layouts/admin/") . "footer.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLayoutFooter.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/layouts/admin/") . "navbar.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLayoutNavbar.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/layouts/admin/") . "sidebar.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLayoutSidebar.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/layouts/") . "inputs.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLayoutInputs.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/admins/") . "index.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminCurdIndex.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/admins/") . "create.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminCurdCreate.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/admins/") . "archives.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminCurdArchives.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("resources/views/admin/admins/") . "info.blade.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminCurdInfo.stub", []);
        $this->file->put($file_path, $file_content);

    }

    function handle()
    {
        $this->makeRoute();
        $this->makeModel();
        $this->makeMigration();
        $this->makeSeeder();
        $this->makeController();
        $this->makeAuthController();
        $this->makeRepository();
        $this->makeAuthRepository();
        $this->makeAuthServices();
        $this->makeAuthMiddleware();
        $this->makeAdminRequest();
        $this->makeAdminAuthRequest();
        $this->makeLimitRequestMiddleware();
        $this->makeAdminDachboardSettings();
        Artisan::call('migrate');
        Artisan::call('db:seed --class=AdminSeeder');
        // Artisan::call('devx:make:blade', ['classname' => 'admins']);
        $this->info('created has been done, make admin guard, register middlewares and routes and helper functions, take asset files, run laracasts/flash');
    }
}

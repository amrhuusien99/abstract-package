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
        $file_path = base_path("app/Http/Repositories/Eloquent/") . "AdminRepository.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminRepository.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthRepository()
    {
        $file_path = base_path("app/Http/Repositories/Eloquent/") . "AdminAuthRepository.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthRepository.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthServices()
    {
        $file_path = base_path("App/Http/ServicesLayer/Admin/AdminServices/") . "AdminAuthService.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthServices.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAuthMiddleware()
    {
        $file_path = base_path("App/Http/Middleware/") . "AdminLogin.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminLoginMiddleware.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAdminRequest()
    {
        $file_path = base_path("app/Http/Requests/Admin/AdminRequests") . "AdminStoreRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminStoreRequest.stub", []);
        $this->file->put($file_path, $file_content);

        $file_path = base_path("app/Http/Requests/Admin/AdminRequests") . "AdminUpdateRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminUpdateRequest.stub", []);
        $this->file->put($file_path, $file_content);
    }

    function makeAdminAuthRequest()
    {
        $file_path = base_path("app/Http/Requests/Admin/AdminRequests") . "AdminLoginRequest.php";
        $this->makeDir(dirname($file_path));
        $file_content = $this->setFileContint(__DIR__ . "/Stubs/AdminAuthRequest.stub", []);
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
        Artisan::call('migrate');
        Artisan::call('db:seed --class=AdminSeeder');
        $this->info('created has been done, make admin guard, register admin middleware, take blade file and seeder file, make migrate and seeder');
    }
}

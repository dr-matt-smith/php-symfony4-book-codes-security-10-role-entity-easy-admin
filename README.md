# php-symfony4-book-codes-security-10-role-entity-easy-admin

1. composer install
1. create and migrate DB 
1. run fixtures
1. run server
1. visit `/admin` to se Dynamically generated Easy Admin interface
1. driven by settings in `/config/packages/easy_admin.yaml`





it includes some fun things like sequencing Fixtures, and getting references to Role objects in the UserFixtures class, so users are created associate to the appropriate Role objects etc..



learn more about the Easy Admin package here:

- [https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html](https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html)
# Laravel Tenancy Application

This repository contains a Laravel application that leverages multi-tenancy capabilities to manage multiple organizations or tenants within a single application. The project uses a Laravel tenancy package to handle tenant isolation and resource segregation.

## Features

- **Multi-Tenancy Support**: Isolate data and resources for each tenant.
- **Automatic Tenant Resolution**: Identify tenants based on subdomains, domains, or other identifiers.
- **Tenant-Specific Middleware**: Apply tenant-specific logic at the request level.
- **Central and Tenant Databases**: Support for shared and isolated databases for tenants.
- **Custom Scopes**: Automatically scope queries to tenants.
- **Easy Tenant Management**: Tools to create, update, and delete tenants efficiently.

## Prerequisites

Ensure you have the following installed:

- PHP >= 8.3
- Composer
- MySQL or other compatible databases
- Laravel >= 12

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/arfin-foysal/tenancy.git
   cd tenancy
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the environment variables:
   ```bash
   cp .env.example .env
   ```
   Configure your `.env` file with database credentials and tenancy settings.

4. Run migrations:
   ```bash
   php artisan migrate
   ```

5. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Usage

- **Tenant Creation**:
  Use the following command to create a new tenant:
  ```bash
  php artisan tenant:create {tenant-name}
  ```

- **Access Tenant**:
  Access the tenant's application by navigating to their subdomain or domain (e.g., `tenant1.example.com`).

- **Central Application**:
  Manage tenants and global settings via the central domain (e.g., `example.com`).

## Configuration

- **Tenant Identification**:
  Modify the configuration file `config/tenancy.php` to set the tenant resolver logic (e.g., subdomain, domain).

- **Middleware**:
  Use the provided tenant middleware to scope requests to the current tenant.

## Contributing

1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Description of changes"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Support

For issues or feature requests, please create an [issue](https://github.com/your-username/your-repo/issues) in the repository.

---

Enjoy using the Laravel Tenancy Application!

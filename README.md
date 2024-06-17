# Excel Import/Export Laravel Project

This project is a Laravel application for importing and exporting Excel files to and from a database. The application provides an interface for users to upload Excel files, validate the data, and store it in the database, as well as export data from the database to Excel files.

## Features

- **Import Data**: Upload Excel files to import data into the database.
- **Export Data**: Export data from the database into Excel files.
- **Data Validation**: Ensure data accuracy during the import process.
- **Error Handling**: Display error messages for any issues during import/export.
- **User Authentication**: Secure access to import/export features.

## Installation

Follow these steps to set up the project locally:

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- Node.js & npm

### Steps

1. **Clone the Repository**
    ```sh
    git clone https://github.com/your-username/excel-import-export-laravel.git
    cd excel-import-export-laravel
    ```

2. **Install Dependencies**
    ```sh
    composer install
    npm install
    ```

3. **Configure Environment Variables**
    Copy the `.env.example` file to `.env` and update the necessary configuration settings (database credentials, etc.).

    ```sh
    cp .env.example .env
    ```

4. **Generate Application Key**
    ```sh
    php artisan key:generate
    ```

5. **Run Migrations**
    ```sh
    php artisan migrate
    ```

6. **Install Laravel Excel**
    ```sh
    composer require maatwebsite/excel
    ```

7. **Run the Application**
    ```sh
    php artisan serve
    ```

## Usage

### Import Data

1. Navigate to the import page.
2. Upload an Excel file.
3. Click "Import" to upload and store the data in the database.

### Export Data

1. Navigate to the export page.
2. Click "Export" to download the data from the database as an Excel file.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any improvements.

## License

This project is open-source and available under the [MIT License](LICENSE).

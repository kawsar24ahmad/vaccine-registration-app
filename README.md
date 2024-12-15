# Vaccine Registration Application

This Vaccine Registration Application helps users register for vaccinations at designated centers, schedule appointments, and receive notifications about their vaccination schedules. The system is designed with scalability and performance in mind, leveraging Laravel's queue system for background processing.

## Features

- **User Registration**: Users can register with their details.
- **Vaccine Center Management**: Manage vaccine centers, including daily scheduling limits.
- **User Scheduling**: Automatically schedule users for vaccinations based on availability.
- **Email Notifications**: Notify users of their scheduled vaccination date.
- **Background Processing**: Asynchronous task execution using Laravel queues.

## Requirements

- PHP >= 8.1
- Composer
- Laravel >= 11
- MySQL >= 8.0
- Node.js and npm (for frontend assets)
- Queue worker (e.g., Redis, database, or SQS)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/kawsar24ahmad/vaccine-registration-app.git
   cd vaccine-registration-app
   ```

2. **Install Dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment Configuration**

   Copy the example `.env` file and configure it:

   ```bash
   cp .env.example .env
   ```

   Update the following in your `.env` file:
   - **Database**: Configure `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
   - **Mail Settings**: Configure `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, and `MAIL_FROM_ADDRESS`.
   - **Queue Driver**: Set `QUEUE_CONNECTION` to `database` or another preferred driver.

4. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**

   ```bash
   php artisan migrate
   ```

6. **Seed Database**

   ```bash
   php artisan db:seed
   ```
   **Install Filament**

    Set up Filament for admin panel functionality:
    ```bash
    php artisan make:filament-user
    ```
    Follow the prompts to create a Filament admin user.

7. **Start the Application**

   ```bash
   php artisan serve
   ```

   Open your browser and navigate to `http://localhost:8000`.

8. **Start the Queue Worker**

   To process notifications and other queued tasks:

   ```bash
   php artisan queue:work
   ```

## Usage

1. **Register Users**

   - Users can register via the frontend interface.

2. **Manage Vaccine Centers**

   - Admins can add and manage vaccine centers with daily scheduling limits.

3. **Schedule Users**

   - Run the scheduling logic via the controller to assign users to vaccine centers:

     ```bash
     php artisan schedule:run
     ```

4. **Email Notifications**

   - Users will receive email notifications about their scheduled vaccination dates.

## Key Files

- **Controllers**:
  - `ScheduleController`: Handles user scheduling and dispatching jobs.

- **Jobs**:
  - `ScheduleUserJob`: Processes individual user scheduling and notifications.

- **Notifications**:
  - `ScheduledUserNotification`: Sends email notifications to users.

## Deployment

1. **Set Up a Server**

   - Install PHP, MySQL, and a web server (e.g., Nginx or Apache).
   - Set up a queue worker service (e.g., Supervisor for managing `queue:work`).

2. **Deploy the Application**

   - Clone the repository to your server.
   - Set up the `.env` file with production credentials.
   - Run migrations and install dependencies.

3. **Secure the Application**

   - Use SSL for HTTPS.
   - Set appropriate file permissions for storage and logs.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

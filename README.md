# Laravel Timeline API

This project is a Laravel-based RESTful API that provides functionality for user registration/login and managing timelines, hashtags, notes, and images.

## 🛠 Features

- User registration and login with Laravel Sanctum
- Automatically creates a timeline for each user upon registration
- Create hashtags, notes, and images for a timeline
- View paginated lists of timelines, hashtags, notes, and images
- View a timeline with its associated hashtags, notes, and images

## 📁 Database Tables

- `users`
- `timelines` (each user has exactly one timeline)
- `hashtags` (each hashtag belongs to a timeline)
- `notes` (each note belongs to a timeline)
- `images` (each image belongs to a timeline)

## 🚀 Setup Instructions

```bash
git clone <project-repo>
cd sepehr_app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## 🔐 Authentication with Sanctum

After login, use the token in the `Authorization` header:

```
Authorization: Bearer <token>
```

## 📡 API Endpoints

### 🔸 Authentication

| Method | Endpoint   | Description             |
|--------|------------|-------------------------|
| POST   | /register  | Register a user (auto-create timeline) |
| POST   | /login     | Login and get token     |

### 🔸 Timeline

| Method | Endpoint       | Description                                 |
|--------|----------------|---------------------------------------------|
| POST   | /timelines     | Create a new timeline (if not already exists) |
| GET    | /timelines     | Get paginated list of timelines             |
| GET    | /timelines/{id}| Get a single timeline with its content      |

### 🔸 Hashtags

| Method | Endpoint   | Description                          |
|--------|------------|--------------------------------------|
| POST   | /hashtags  | Create a hashtag for a timeline      |
| GET    | /hashtags  | Get paginated list of hashtags       |

### 🔸 Notes

| Method | Endpoint | Description                         |
|--------|----------|-------------------------------------|
| POST   | /notes   | Create a note for a timeline        |
| GET    | /notes   | Get paginated list of notes         |

### 🔸 Images

| Method | Endpoint | Description                         |
|--------|----------|-------------------------------------|
| POST   | /images  | Upload an image for a timeline      |
| GET    | /images  | Get paginated list of images        |

## 📦 Example Request for Hashtag Creation

```
POST /api/hashtags
Headers:
  Authorization: Bearer <token>
Body (JSON):
{
  "timeline_id": 1,
  "name": "#Laravel"
}
```

## 👤 Developer

- Name: Porya Rohizade
- Laravel Developer
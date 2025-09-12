# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 8.x web application that combines a MUD (Multi-User Dungeon) game client with forum/bulletin board functionality. The project features:

- **Web-based MUD client** with WebSocket support and terminal emulation using XTerm.js
- **Forum system** with categories, threads, and comments
- **Admin panel** using Laravel Admin package
- **Question bank** module for educational content
- **Multi-database architecture** (MySQL for main app, SQLite for MUD data)

## Essential Commands

### Frontend Development
```bash
npm install              # Install frontend dependencies
npm run dev             # Build assets for development
npm run watch           # Build and watch for changes
npm run production      # Build optimized assets for production
```

### Backend Development
```bash
composer install        # Install PHP dependencies
php artisan migrate     # Run database migrations
php artisan serve       # Start development server
```

### Testing
```bash
php artisan test        # Run PHPUnit tests
php artisan test --filter TestName  # Run specific test
```

## Architecture Overview

### Database Structure
The application uses multiple database connections:
- **MySQL** (default): Main application data (users, forum content, admin data)
- **SQLite** (`database/db.sqlite`): MUD-specific user data and game state
- **Custom connections**: `mybbs` for legacy forum data, `sqlite_lpc` for LPC data

### Key Models and Relationships
- **User** (`app/User.php`): Main user model with forum relationships
- **Mud** (`app/Mud.php`): MUD-specific user model using SQLite connection
- **Thread** (`app/Thread.php`): Forum threads with caching and soft deletes
- **Node** (`app/Node.php`): Forum categories/sections
- **Comment** (`app/Comment.php`): Forum comments
- **Question/Type/Category**: Question bank system

### Frontend Architecture
- **Laravel Mix** for asset compilation
- **Vue.js** components for reactive UI elements
- **XTerm.js** for terminal emulation in MUD clients
- **WebSocket clients** in `public/mud.html`, `public/websocket.html`, `public/lpc.html`

### Admin Panel
Located in `app/Admin/`, uses Laravel Admin package for content management.

### WebSocket Implementation
Recent development focuses on WebSocket support for real-time MUD gameplay. Clients are in `public/` directory with MSP (MUD Sound Protocol) support.

## Development Notes

- The application supports both English and Chinese interfaces
- Forum threads use advanced caching for performance
- Soft deletes are implemented for content moderation
- Multiple authentication systems: main app users vs MUD users (different databases)
- Recent commits show active development on WebSocket client functionality
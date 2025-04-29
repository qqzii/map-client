# Changelog

All notable changes to this project will be documented in this file.

## [1.1.0] - 2025-04-29

### Added
- Helper functions file (`helpers.php`) containing essential utilities
- Comprehensive documentation for all public methods and usage examples

### Fixed
- Completely rewritten `retry()` function to remove Laravel dependencies
- Improved error handling in API client calls
- Fixed query parameter building in GET requests

## [1.0.0] - 2025-04-28

### Added
- Initial release of MAP API client
- Single entry point interface (`MAPClient`)
- Configuration-based initialization
- Support for all major HTTP methods (GET, POST, PUT, PATCH, DELETE)
- Automatic request retry mechanism
- Built-in logging capabilities

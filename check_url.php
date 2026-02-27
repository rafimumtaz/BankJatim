
<?php
// Simulate web request by modifying server global and facade mocks
// But since I'm running in CLI, I need to test if `url()` works here.
// Actually, I can't easily simulate request context without starting a server.

// Instead, I'll create a script that just outputs `url('storage')` and `config('app.url')`.
echo "Config app.url: " . config('app.url') . "\n";
echo "url('storage'): " . url('storage') . "\n";

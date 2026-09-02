<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ModuleRegistry
{
    protected static array $defaultModules = [
        'website' => true,
        'blog' => true,
        'shop' => false,
        'hr' => false,
        'projects' => false,
    ];

    public static function getActiveModules(): array
    {
        if (Storage::disk('local')->exists('modules.json')) {
            $json = Storage::disk('local')->get('modules.json');
            $data = json_decode($json, true);
            if (is_array($data)) {
                return array_merge(self::$defaultModules, $data);
            }
        }

        return self::$defaultModules;
    }

    public static function isModuleActive(string $module): bool
    {
        $modules = self::getActiveModules();

        return (bool) ($modules[$module] ?? false);
    }

    public static function setModuleActive(string $module, bool $active): void
    {
        $modules = self::getActiveModules();
        $modules[$module] = $active;
        Storage::disk('local')->put('modules.json', json_encode($modules, JSON_PRETTY_PRINT));
    }

    public static function saveAll(array $modules): void
    {
        $current = self::getActiveModules();
        $merged = array_merge($current, $modules);
        Storage::disk('local')->put('modules.json', json_encode($merged, JSON_PRETTY_PRINT));
    }
}

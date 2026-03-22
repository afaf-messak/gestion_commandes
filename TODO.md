# Fix "Class Commande not found" on Statistics Page

## Status: In Progress

### Step 1: ✅ Understand Issue
- Direct `Commande::sum('total')` in Blade view without import

### Step 2: ✅ Update StatistiqueController.php
- Add `$chiffreAffaires = Commande::sum('total');`
- Pass to view via compact()

### Step 3: ⏳ Update resources/views/statistiques/index.blade.php
- Replace `Commande::sum('total')` with `$chiffreAffaires`

### Step 4: ⏳ Clear Laravel caches
- `php artisan view:clear`
- `php artisan cache:clear`

### Step 5: ✅ Test
- Visit `/statistiques`
- Verify no error, correct revenue displayed

## Commands to run after edits:
```bash
php artisan view:clear && php artisan cache:clear
```


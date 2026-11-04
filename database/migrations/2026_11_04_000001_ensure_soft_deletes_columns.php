<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Pengaman: model User, Room, dan MasterItem memakai SoftDeletes.
 * Jika tabelnya dibuat dari versi lama (tanpa kolom deleted_at), query akan
 * gagal dengan "Unknown column 'deleted_at'". Migration ini menambahkan
 * kolom tersebut HANYA jika belum ada, sehingga aman dijalankan berulang.
 */
return new class extends Migration
{
    private array $tables = ['users', 'rooms', 'master_items'];

    public function up(): void
    {
        foreach ($this->tables as $table) {
            if (Schema::hasTable($table) && ! Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, fn (Blueprint $t) => $t->softDeletes());
            }
        }
    }

    public function down(): void
    {
        // Sengaja kosong: kolom ini memang diharapkan ada oleh migration awal.
    }
};

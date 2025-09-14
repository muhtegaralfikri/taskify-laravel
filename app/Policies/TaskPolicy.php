<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     * (Biarkan controller yang mengatur ini, tapi user harus login)
     */
    public function viewAny(User $user): bool
    {
        return true; // User yang login boleh melihat halaman daftar task (isinya diatur controller)
    }

    /**
     * Determine whether the user can view the model.
     * Aturan: Boleh, HANYA JIKA ID user = ID pemilik task.
     */
    public function view(User $user, Task $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can create models.
     * Aturan: User manapun yang sudah login boleh membuat task (untuk dirinya sendiri).
     */
    public function create(User $user): bool
    {
        return true; 
    }

    /**
     * Determine whether the user can update the model.
     * Aturan: Boleh, HANYA JIKA ID user = ID pemilik task.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Aturan: Boleh, HANYA JIKA ID user = ID pemilik task.
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     * (Tidak pakai soft delete, biarkan kosong)
     */
    public function restore(User $user, Task $task): bool
    {
        // Biarkan false (atau hapus fungsi ini jika tidak pakai SoftDeletes)
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * (Tidak pakai soft delete, biarkan kosong)
     */
    public function forceDelete(User $user, Task $task): bool
    {
        // Biarkan false
        return false;
    }
}
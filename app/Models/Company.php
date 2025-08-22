<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes; // Ini penting untuk fungsionalitas soft deletes

class Company extends Model
{
    use HasFactory, SoftDeletes; // Aktifkan trait SoftDeletes di sini

    /**
     * Kolom-kolom yang dapat diisi secara massal (Mass Assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // Foreign key ke tabel users
        'uuid', // Tambahkan 'uuid' di sini
        // --- Data Penanggung Jawab / Pimpinan ---
        'pic_name',
        'pic_nik',
        'pic_npwp',
        'pic_position',
        'pic_address',

        // Kolom untuk file Penanggung Jawab
        'pic_ktp_file',    // Nama file KTP PIC
        'pic_npwp_file',   // Nama file NPWP PIC
        'pic_photo_file',  // Nama file foto PIC

        // --- Data Perusahaan / Asosiasi ---
        'company_name',            // Nama lengkap perusahaan/asosiasi
        'company_type',            // Tipe perusahaan (PT, CV, dll.) atau jenis asosiasi
        'company_short_name',      // Kolom untuk singkatan asosiasi (misal: KADIN)
        'company_nib',             // Nomor Induk Berusaha
        'company_sbu',             // Sertifikat Badan Usaha (jika relevan)
        'company_npwp',            // NPWP perusahaan/asosiasi
        'company_address',         // Alamat lengkap
        'company_province',        // Provinsi
        'company_city',            // Kota/Kabupaten
        'company_postal_code',     // Kode pos
        'company_kbli',            // KBLI (Klasifikasi Baku Lapangan Usaha Indonesia)
        'company_business_category', // Kategori bisnis perusahaan

        // Kolom untuk file Perusahaan / Asosiasi
        'company_nib_file',        // Nama file NIB OSS RBA
        'company_sk_kemenkumham_file', // Nama file SK Kemenkumham
        'company_npwp_file',       // Nama file NPWP Perusahaan
        'file_surat_permohonan_alb', // Nama file surat permohonan ALB
        'file_adart',              // Nama file AD/ART
        'file_akta_pendirian',     // Nama file Akta Pendirian Perusahaan
        'file_sk_kemenkumham_alb', // Nama file SK Kemenkumham ALB
        'file_hasil_munas',        // Nama file Hasil Munas
        'file_kode_etik',          // Nama file Kode Etik
        'file_logo_alb',           // Nama file Logo ALB
        'file_sk_pengurus_asosiasi', // Nama file SK Pengurus Asosiasi
        'file_daftar_dpd',         // Nama file Daftar DPD
        'file_daftar_anggota',     // Nama file Daftar Anggota
        'file_kta_ab_asosiasi',    // Nama file KTA AB Asosiasi

        // --- Data Staff Sekretariat ALB (jika ada) ---
        'name_staff_asosiasi',  // Nama staff sekretariat
        'phone_staff_asosiasi', // Nomor telepon staff sekretariat
        'email_staff_asosiasi', // Email staff sekretariat
        'number_of_members',    // Jumlah anggota (untuk asosiasi)
        'phone_gm_alb',         // Nomor telepon Ketua Umum (General Manager ALB)

        // --- Data Keanggotaan ---
        'membership_type',         // Tipe keanggotaan (misal: "Anggota Biasa", "Anggota Luar Biasa")
        'membership_classification', // Klasifikasi keanggotaan (jika ada)
        'membership_expired_date', // Tanggal kedaluwarsa keanggotaan
        'membership_status',       // Status keanggotaan (misal: "Aktif", "Menunggu Verifikasi", "Ditolak", "Belum Mengisi Data")
        'national_registration_number', // Nomor Registrasi Nasional (seringkali unik)
        'member_number',           // Nomor anggota khusus (jika ada)
        'duration_qty',            // Durasi keanggotaan (dalam jumlah, misal bulan/tahun)
    ];

    /**
     * Definisi relasi BelongsTo: Company dimiliki oleh satu User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
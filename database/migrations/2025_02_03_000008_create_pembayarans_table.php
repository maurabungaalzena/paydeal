Schema::create('pembayarans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('id_petugas')->constrained('petugas');
    
    // Ubah nisn ke unsignedBigInteger jika referensi ke id siswa, atau tambahkan index
    $table->char('nisn', 10)->index(); 
    $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');

    $table->date('tgl_bayar');
    $table->string('bulan_dibayar');
    $table->string('tahun_dibayar');
    
    // Ubah nama tabel jika perlu
    $table->foreignId('id_spp')->constrained('spp'); 

    $table->enum('metode', ['tunai', 'transfer', 'e-wallet']);
    $table->integer('jumlah_bayar');
    $table->timestamps();
});

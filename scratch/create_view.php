<?php
$content = file_get_contents('resources/views/user/profile.blade.php');
$parts = explode('{{-- ===== PROFILE BANNER ===== --}}', $content);
$head = $parts[0];
$form = <<<EOT
            <div style='background: white; border-radius: 14px; padding: 30px; box-shadow: 0 1px 4px rgba(0,0,0,0.07);'>
                <h2 style='margin-bottom: 20px; font-size: 20px;'>Edit Profil</h2>
                <form action='{{ route("user.profil.update") }}' method='POST'>
                    @csrf
                    @method('PUT')
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Nama Lengkap</label>
                        <input type='text' name='nama_lengkap' value='{{ old("nama_lengkap", \$user->nama_lengkap) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Email</label>
                        <input type='email' name='email' value='{{ old("email", \$user->email) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>NIM</label>
                        <input type='text' name='nim' value='{{ old("nim", \$user->nim) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Angkatan</label>
                        <input type='text' name='angkatan' value='{{ old("angkatan", \$user->angkatan) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Program Studi</label>
                        <input type='text' name='program_studi' value='{{ old("program_studi", \$user->program_studi) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Nomor Telepon</label>
                        <input type='text' name='nomor_telepon' value='{{ old("nomor_telepon", \$user->nomor_telepon) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 24px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Password Baru (Opsional)</label>
                        <input type='password' name='password' placeholder='Kosongkan jika tidak ingin mengubah' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='display:flex; gap:12px;'>
                        <button type='submit' style='padding:10px 20px; background:#1a5fb4; color:white; border:none; border-radius:8px; font-weight:600; cursor:pointer;'>Simpan Perubahan</button>
                        <a href='{{ route("user.profil") }}' style='padding:10px 20px; background:#f3f4f6; color:#374151; border:none; border-radius:8px; font-weight:600; text-decoration:none; display:inline-block;'>Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
</html>
EOT;
file_put_contents('resources/views/user/edit-profile.blade.php', $head . $form);
echo "View created successfully";

$bp_file = $this->request->getFile('bp_bp_file');

if ($bp_file->isValid() && !$bp_file->hasMoved()) {
    $bp_newName = $bp_file->getRandomName(); 
    $bp_file->move('uploads/bp', $bp_newName); 
    $path_bp = 'uploads/bp/' . $bp_newName;
} else {
    session()->setFlashdata('errors-bp', ['bp_bp_file' => 'Gagal mengunggah file.']);
    return redirect()->to('bukti-pembayaran')->withInput();
}
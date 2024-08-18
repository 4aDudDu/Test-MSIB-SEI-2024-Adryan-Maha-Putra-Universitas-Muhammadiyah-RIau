package com.proyekmsib.adryan.controller;

import com.proyekmsib.adryan.model.Proyek;
import com.proyekmsib.adryan.repository.ProyekRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/proyek")
public class ProyekController {

    @Autowired
    private ProyekRepository proyekRepository;

    @PostMapping
    public Proyek createProyek(@RequestBody Proyek proyek) {
        return proyekRepository.save(proyek);
    }

    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Proyek> getProyekById(@PathVariable int id) {
        Proyek proyek = proyekRepository.findById(id).orElse(null);
        if (proyek == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(proyek);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable int id, @RequestBody Proyek proyekDetails) {
        Proyek proyek = proyekRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Proyek not found"));

        proyek.setNamaProyek(proyekDetails.getNamaProyek());
        proyek.setClient(proyekDetails.getClient());
        proyek.setTglMulai(proyekDetails.getTglMulai());
        proyek.setTglSelesai(proyekDetails.getTglSelesai());
        proyek.setPimpinanProyek(proyekDetails.getPimpinanProyek());
        proyek.setKeterangan(proyekDetails.getKeterangan());
        proyek.setLokasi(proyekDetails.getLokasi());

        final Proyek updatedProyek = proyekRepository.save(proyek);
        return ResponseEntity.ok(updatedProyek);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteProyek(@PathVariable int id) {
        Proyek proyek = proyekRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Proyek not found"));

        proyekRepository.delete(proyek);
        return ResponseEntity.ok().build();
    }
}

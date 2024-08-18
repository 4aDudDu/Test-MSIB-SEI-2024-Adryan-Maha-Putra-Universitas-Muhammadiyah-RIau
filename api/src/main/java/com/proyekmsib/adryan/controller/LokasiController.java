package com.proyekmsib.adryan.controller;

import com.proyekmsib.adryan.model.Lokasi;
import com.proyekmsib.adryan.repository.LokasiRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Lokasi createLokasi(@RequestBody Lokasi lokasi) {
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Lokasi> getLokasiById(@PathVariable int id) {
        Lokasi lokasi = lokasiRepository.findById(id).orElse(null);
        if (lokasi == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(lokasi);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable int id, @RequestBody Lokasi lokasiDetails) {
        Lokasi lokasi = lokasiRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Lokasi not found"));

        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setNegara(lokasiDetails.getNegara());
        lokasi.setProvinsi(lokasiDetails.getProvinsi());
        lokasi.setKota(lokasiDetails.getKota());

        final Lokasi updatedLokasi = lokasiRepository.save(lokasi);
        return ResponseEntity.ok(updatedLokasi);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteLokasi(@PathVariable int id) {
        Lokasi lokasi = lokasiRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Lokasi not found"));

        lokasiRepository.delete(lokasi);
        return ResponseEntity.ok().build();
    }
}

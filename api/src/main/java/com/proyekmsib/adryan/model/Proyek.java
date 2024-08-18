package com.proyekmsib.adryan.model;

import jakarta.persistence.*;
import java.sql.Timestamp;
import java.util.List;

@Entity
public class Proyek {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    private String namaProyek;
    private String client;
    private Timestamp tglMulai;
    private Timestamp tglSelesai;
    private String pimpinanProyek;

    @Column(columnDefinition = "TEXT")
    private String keterangan;

    @ManyToMany
    @JoinTable(
            name = "proyek_lokasi",
            joinColumns = @JoinColumn(name = "proyek_id"),
            inverseJoinColumns = @JoinColumn(name = "lokasi_id")
    )
    private List<Lokasi> lokasi;

    @Column(nullable = false, updatable = false, insertable = false, columnDefinition = "TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
    private Timestamp createdAt;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNamaProyek() {
        return namaProyek;
    }

    public void setNamaProyek(String namaProyek) {
        this.namaProyek = namaProyek;
    }

    public String getClient() {
        return client;
    }

    public void setClient(String client) {
        this.client = client;
    }

    public Timestamp getTglMulai() {
        return tglMulai;
    }

    public void setTglMulai(Timestamp tglMulai) {
        this.tglMulai = tglMulai;
    }

    public Timestamp getTglSelesai() {
        return tglSelesai;
    }

    public void setTglSelesai(Timestamp tglSelesai) {
        this.tglSelesai = tglSelesai;
    }

    public String getPimpinanProyek() {
        return pimpinanProyek;
    }

    public void setPimpinanProyek(String pimpinanProyek) {
        this.pimpinanProyek = pimpinanProyek;
    }

    public String getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }

    public List<Lokasi> getLokasi() {
        return lokasi;
    }

    public void setLokasi(List<Lokasi> lokasi) {
        this.lokasi = lokasi;
    }

    public Timestamp getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }
}

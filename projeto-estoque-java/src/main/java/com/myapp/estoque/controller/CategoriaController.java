package com.myapp.estoque.controller;

import com.myapp.estoque.exceptions.EmptyObjectException;
import com.myapp.estoque.model.Categoria;
import com.myapp.estoque.service.CategoriaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/categoria")
public class CategoriaController {
    @Autowired
    private CategoriaService categoriaService;

    @PostMapping("/criar")
    public ResponseEntity<Categoria> criarCategoria(@RequestBody Categoria categoria) {
        return ResponseEntity.ok(categoriaService.criar(categoria));
    }

    @GetMapping("/id/{id}")
    public ResponseEntity<Categoria> getCategoriaById(@PathVariable int id) {
        if (categoriaService.isEmpty(id)) {
            throw new EmptyObjectException("Categoria não encontrada.");
        }

        Categoria categoria = categoriaService.buscarPeloId(id).get();
        return ResponseEntity.ok(categoria);
    }

    @GetMapping("/buscar")
    public ResponseEntity<Categoria> getCategoriaByName(@RequestParam String nome) {
        Categoria categoria = categoriaService.buscarPeloNome(nome);

        if (categoria == null) {
            throw new EmptyObjectException("Categoria não encontrada.");
        }

        return ResponseEntity.ok(categoria);
    }

}

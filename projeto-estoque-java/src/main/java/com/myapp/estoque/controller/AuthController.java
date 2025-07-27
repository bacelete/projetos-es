package com.myapp.estoque.controller;

import com.myapp.estoque.dto.AuthDTO;
import com.myapp.estoque.dto.RegisterDTO;
import com.myapp.estoque.model.Usuario;
import com.myapp.estoque.repository.UsuarioRepository;
import com.myapp.estoque.security.TokenService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/auth")
public class AuthController {
    @Autowired
    private AuthenticationManager authenticationManager;

    @Autowired
    private UsuarioRepository usuarioRepository;

    @Autowired
    private TokenService tokenService;

    @Value("${api.security.token.secret}")
    private String secret;

    @PostMapping("/login")
    public ResponseEntity<?> login(@RequestBody @Valid AuthDTO data) {
        try {
            var usernamePassword = new UsernamePasswordAuthenticationToken(data.getLogin(), data.getPassword());
            var auth = this.authenticationManager.authenticate(usernamePassword);

            String token = tokenService.generateToken((Usuario) auth.getPrincipal());
            return ResponseEntity.ok("Autenticado com sucesso!");

        } catch (AuthenticationException e) {
            return ResponseEntity.status(HttpStatus.UNAUTHORIZED).body("Usuário ou senha inválidos");
        }
    }

    @PostMapping("/register")
    public ResponseEntity<?> register(@RequestBody @Valid RegisterDTO data) {
        if (usuarioRepository.findByLogin(data.getLogin()) != null) {
            return ResponseEntity.badRequest().build();
        }

        String encryptedPassword = new BCryptPasswordEncoder().encode(data.getPassword());
        Usuario usuario = new Usuario(data.getLogin(), encryptedPassword, data.getRole());

        this.usuarioRepository.save(usuario);

        return ResponseEntity.ok().build();
    }
}

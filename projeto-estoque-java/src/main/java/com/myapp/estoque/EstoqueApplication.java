package com.myapp.estoque;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;

@SpringBootApplication
public class EstoqueApplication {
	public static void main(String[] args) {
		SpringApplication.run(EstoqueApplication.class, args);
	}
}

package com.myapp.estoque.exceptions;

public class EmptyObjectException extends RuntimeException{
    public EmptyObjectException(String message) { super(message); }
    public EmptyObjectException() { super(); }
}

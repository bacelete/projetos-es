import { Button } from "@mui/material"
import AlertaSucesso from "./AlertaSucesso"
import { useState } from "react"

export default function BotaoEnviar() {
    [showAlert, setShowAlert] = useState(false); 

    return (
        <div>
            <Button variant="contained" color="success" type="submit" onClick={() => setShowAlert(true)}>Enviar</Button>
            {showAlert && <AlertaSucesso />}
        </div>
    )
}
import Alert from '@mui/material/Alert';
import AlertTitle from '@mui/material/AlertTitle';

export default function AlertaSucesso({mensagem}) {
    return (
        <Alert severity="success" onClose={() => {}}>
            <AlertTitle>Sucesso!</AlertTitle>
            <p>{mensagem}</p>
        </Alert>
    )
}

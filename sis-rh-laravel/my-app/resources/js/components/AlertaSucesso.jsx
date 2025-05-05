import Alert from '@mui/material/Alert';
import AlertTitle from '@mui/material/AlertTitle';

export default function AlertaSucesso() {
    return (
        <Alert severity="success">
            <AlertTitle>Sucesso!</AlertTitle>
            <p>A solicitação foi enviada com sucesso.</p>
        </Alert>
    )
}

import React from "react";
import {
  Button,
  Dialog,
  DialogHeader,
  DialogBody,
  DialogFooter,
} from "@material-tailwind/react";
 
export function DialogDefault() {
  const [open, setOpen] = React.useState(false);
 
  const handleOpen = () => setOpen(!open);
 
  return (
    <>
      <Button onClick={handleOpen} variant="gradient">
        Open Dialog
      </Button>
      <Dialog open={open} handler={handleOpen}>
        <DialogHeader>Tem certeza que deseja excluir a solicitação?</DialogHeader>
        <DialogBody>
          Ao excluir o envio da solicitação, você não poderá mais ter acesso a ela.
        </DialogBody>
        <DialogFooter>
          <Button
            variant="text"
            color="red"
            onClick={handleOpen}
            className="mr-1"
          >
            <span>Cancelar</span>
          </Button>
          <Button variant="gradient" color="green" onClick={handleOpen}>
            <span>Confirmar</span>
          </Button>
        </DialogFooter>
      </Dialog>
    </>
  );
}
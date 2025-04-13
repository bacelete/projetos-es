import Searchbar from "./Searchbar";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCartShopping } from "@fortawesome/free-solid-svg-icons";

function Navbar() {
    return (
        <div className="flex bg-[#031626] h-[60px] p-5 gap-5 justify-between items-center md:flex-auto">
            <h1 className="text-white text-3xl">Shop</h1>
            <Searchbar />
            <FontAwesomeIcon className="w-[30px] text-white" icon={faCartShopping} />
        </div>
    )
}

export default Navbar;
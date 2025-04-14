import { faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

function Searchbar() {
    return (
        <div className="flex flex-row">
            <input className="bg-white p-2 w-2xl rounded-sm" type="text" name="searchbar" id="searchbar" placeholder="Pesquisar" />
            <div className="bg-[#fac459] p-3 rounded-sm cursor-pointer hover:bg-[#eab753]">
                <FontAwesomeIcon className="w-[20px] h-[20px]" icon={faMagnifyingGlass} />
            </div>
        </div>
    )
}

export default Searchbar;
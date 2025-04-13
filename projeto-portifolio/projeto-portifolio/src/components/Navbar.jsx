import Searchbar from "./Searchbar";

function Navbar() {
    return (
        <div className="flex bg-[#031626] h-[80px] p-4">
            <h1 className="text-white text-3xl">Shop</h1>
            <Searchbar />
        </div>
    )
}

export default Navbar;
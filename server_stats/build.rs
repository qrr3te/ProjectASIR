fn main() {
    println!("cargo:rustc-link-lib=static=disksize");
    println!("cargo:rustc-link-search=native=c");
}

a = int(input("ingrese: "))
if a % 4 == 0:
    if a % 100 != 0:
        if a % 400 == 0:
            print("n")
        else:
            print("b")
    else:
        print("n")
else:
    print("n")


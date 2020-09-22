 #include <iostream>
using namespace std;

void InsertionSort (int A[], int N);
int main()
{
    int A[100],N,i;

    cout<<"Number of elements:"<<endl;
    cin>>N;


    cout<<"The unsorted array:"<<endl;
    for(i=1;i<=N;i++)
    {
        cin>>A[i];

    }

    InsertionSort(A,N);

    cout<<"the sorted array:"<<endl;
    for(i=1;i<=N;i++)
    {
        cout<<A[i]<<" ";
    }

    return 0;
}

void InsertionSort (int A[], int N)
{
    int i, j, temp;

    for(i=2; i<=N; i++)
    {
        j=i;

        while(j>1 && A[j-1]>A[j])
        {
            temp=A[j];
            A[j]=A[j-1];
            A[j-1]=temp;
            j=j-1;
        }
    }
}

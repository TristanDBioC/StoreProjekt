
import {initializeApp} from 'firebase/app'
import {
  getFirestore, getDocs, collection, getDoc
} from 'firebase/firestore'


const firebaseConfig = {
    apiKey: "AIzaSyDmaVEr15qK0v9DLxHgCjY4tBuD-aS-VGo",
    authDomain: "cs36-cd6b3.firebaseapp.com",
    projectId: "cs36-cd6b3",
    storageBucket: "cs36-cd6b3.appspot.com",
    messagingSenderId: "1018606536119",
    appId: "1:1018606536119:web:7c50f7168943e696c31432",
    measurementId: "G-8DRB5WVTEE"
  };


  // init firebase app
  initializeApp(firebaseConfig)
  console.log("initialize app4")

  // init firestore
  const db = getFirestore()
  

  // collection reference
  const colRef = collection(db, 'user')

// get cikkectuib data
getDocs(colRef).then((snapshot) => {
  let user = []
  snapshot.docs.forEach((doc) => {
    user.push({...doc.data(), id: doc.id})
  })
  console.log(user)
})
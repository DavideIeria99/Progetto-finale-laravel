import * as THREE from "three";
import { WebGLRenderer } from "three";


let value = Math.round(Math.random() * 10)

let color
if (value >= 5) {
     color= '#b388eb'
    }else{
     color = '#8aaa79'   
}

const parameters = {
    materialColor: color
}
/**
 * Base
 */
// Canvas
let canvas = document.querySelector('.webgl')


// Scene
const scene = new THREE.Scene()

// objects
// material


// mesh
const objectsDistance = 4


// particles
// geometry
const particlesCount = 700
const positions = new Float32Array(particlesCount*3)
for(let i = 0;i<particlesCount;i++){
    positions[i*3]  =  (Math.random()-0.5)*10            //x
    positions[i*3+1]= objectsDistance*0.5 - Math.random() * objectsDistance* 3           //y
    positions[i*3+2]= (Math.random()-0.5 )*10                //z
}
const particlesGeometry = new THREE.BufferGeometry()
    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions,3))
// material
const particlesMaterial = new THREE.PointsMaterial({
    color:parameters.materialColor,
    sizeAttenuation: true,
    size:0.03
})
//points
const particles = new THREE.Points(particlesGeometry, particlesMaterial)
scene.add(particles)



/**
 * Sizes
 */
const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
}

window.addEventListener('resize', () =>
{
    // Update sizes
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    // Update camera
    camera.aspect = sizes.width / sizes.height
    camera.updateProjectionMatrix()

    // Update renderer
    renderer.setSize(sizes.width, sizes.height)
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
})

/**
 * Camera
 */

// group camera per parallax
const cameraGroup = new THREE.Group()
scene.add(cameraGroup)
// Base camera
const camera = new THREE.PerspectiveCamera(35, sizes.width / sizes.height, 0.1, 100)
camera.position.z = 6
cameraGroup.add(camera)

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha:true   
})
renderer.setSize(sizes.width, sizes.height)
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))

// scroll
let scrollY = window.scrollY
let currentSection =  0
window.addEventListener('scroll',()=>{

    scrollY = window.scrollY
    const newSection = Math.round(scrollY/sizes.height) 
    if(newSection != currentSection){
        currentSection=newSection
    }
})

// cursor
const cursor = {}
cursor.x=0
cursor.y=0

window.addEventListener('mousemove',(event)=>{
    cursor.x = (event.clientX/sizes.width)-0.5
    cursor.y = (event.clientY/sizes.height)-0.5
})
/**
 * Animate
 */
const clock = new THREE.Clock()
let previousTime = 0

const tick = () =>
{
    const elapsedTime = clock.getElapsedTime()
    const deltaTime= elapsedTime-previousTime
    previousTime=elapsedTime

    // animate camera
    camera.position.y = - scrollY/sizes.height * objectsDistance

    const parallaxX = cursor.x*0.5
    const parallaxY = -cursor.y *0.5
    cameraGroup.position.x += (parallaxX - cameraGroup.position.x)*5* deltaTime
    cameraGroup.position.y += (parallaxY - cameraGroup.position.y)*5* deltaTime

    // Render
    renderer.render(scene, camera)

    window.requestAnimationFrame(tick)
}



tick()

